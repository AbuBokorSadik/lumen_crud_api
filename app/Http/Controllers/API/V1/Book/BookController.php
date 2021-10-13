<?php

namespace App\Http\Controllers\API\v1\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{
    public function index()
    {
        try {
            $book = Book::paginate(15);

            return response()->json([
                'code' => 200,
                'messages' => ['success'],
                'data' => $book,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());

            return response()->json([
                'code' => 500,
                'messages' => ['Failed'],
                'data' => null
            ], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name' => 'required|unique:books',
                'writer' => 'required',
                'publication' => 'required',
            ]);

            if ($validation->fails()) {
                throw new ValidationException($validation);
            }

            $book = Book::create([
                'name' => $request->name,
                'writer' => $request->writer,
                'publication' => $request->publication
            ]);

            return response()->json([
                'code' => 200,
                'messages' => ['success'],
                'data' => $book,
            ]);
        } catch (ValidationException $e) {
            Log::error($e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());

            $error_msg = [];
            // echo '<pre>';
            // print_r($e->errors());
            // exit();
            foreach($e->errors() as $key => $msg){
                $error_msg[] = $msg[0];
            }

            return response()->json([
                'code' => 422,
                'messages' => $error_msg,
                'data' => null
            ], 422);
        } catch (\Exception $e) {
            Log::error($e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());

            return response()->json([
                'code' => 500,
                'messages' => [$e->getMessage()],
                'data' => null
            ], 500);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $book = Book::find($id);
            $book->name = $request->name;
            $book->writer = $request->writer;
            $book->publication = $request->publication;
            $book->save();

            return response()->json([
                'code' => 200,
                'messages' => ['success'],
                'data' => $book,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());

            return response()->json([
                'code' => 500,
                'messages' => [$e->getMessage()],
                'data' => null
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $book = Book::find($id);
            $book->delete();

            return response()->json([
                'code' => 200,
                'messages' => ['success'],
                'data' => $book,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            return response()->json([
                'code' => 500,
                'messages' => [$e->getMessage()],
                'data' => null
            ], 500);
        }
    }
}
