<?php

namespace App\Http\Controllers\API;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\DocumentResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;

class DocumentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        return $this->sendResponse(DocumentResource::collection($documents), 'Documents fetched.');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {

        $validatedData = $request->validated();

        $id = Auth::user()->id;
        $uploaded_document = $request->file('document')->store('documents', 'public');

        $file_type = $request->document->extension();
        $image = $request->file('image')->store('document_images', 'public');

        $validatedData['user_id'] = $id;
        $validatedData['document'] = $uploaded_document;
        $validatedData['document_type'] = $file_type;
        $validatedData['image'] = $image;

        $document = Document::create($validatedData);
        return $this->sendResponse(new DocumentResource($document), 'Document created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);
        if (is_null($document)) {
            return $this->sendError('Document does not exist.');
        }
        return $this->sendResponse(new DocumentResource($document), 'Document fetched.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentRequest  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        // $input = $request->all();
        // $validator = Validator::make($input, [
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);
        // if($validator->fails()){
        //     return $this->sendError($validator->errors());       
        // }
        // $document->title = $input['title'];
        // $document->description = $input['description'];
        // $document->save();

        // return $this->sendResponse(new DocumentResource($blog), 'Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return $this->sendResponse([], 'Document deleted.');
    }
}
