<?php

namespace App\Http\Controllers\API\v1\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Traits\ApiResponseTraits;

class BookController extends Controller
{
    use ApiResponseTraits;

    public function index()
    {
        try {
            $book = Book::paginate(15);

            return $this->respondInJSON(200, ['success'], $book);
        } catch (\Exception $e) {
            Log::error($e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());

            return $this->failedResponse(500, ['Failed'], null);
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

            return $this->respondInJSON(200, ['success'], $book);
        } catch (ValidationException $e) {
            Log::error($e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());

            return $this->failedResponse(422, [], $e, true);
        } catch (\Exception $e) {
            Log::error($e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());

            return $this->failedResponse(500, ['Failed'], null);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $book = Book::find($id);

            if(!$book){
                return $this->failedResponse(404, ['Book not found'], null);
            }

            $validation = Validator::make($request->all(), [
                'name' => ['required', Rule::unique('books', 'name')->ignore($book->id)],
                'writer' => 'required',
                'publication' => 'required',
            ]);

            if ($validation->fails()) {
                throw new ValidationException($validation);
            }

            $book->name = $request->name;
            $book->writer = $request->writer;
            $book->publication = $request->publication;
            $book->save();

            return $this->respondInJSON(200, ['success'], $book);
        } catch (ValidationException $e) {
            Log::error($e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());

            return $this->failedResponse(422, [], $e, true);
        } catch (\Exception $e) {
            Log::error($e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());

            return $this->failedResponse(500, ['Failed'], null);
        }
    }

    public function delete($id)
    {
        try {
            $book = Book::find($id);

            if(!$book){
                return $this->failedResponse(404, ['Book not found'], null);
            }
            
            $book->delete();

            return $this->respondInJSON(200, ['success'], $book);
        } catch (\Exception $e) {
            Log::error($e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());

            return $this->failedResponse(500, ['Failed'], null);
        }
    }
}
