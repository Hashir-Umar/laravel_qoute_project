<?php

namespace App\Http\Controllers;

use App\Qoute;
use App\Author;
use Illuminate\Http\Request;

class QouteController extends Controller
{
    public function getIndex($author_name = null) {

        if(!is_null($author_name)) 
        {
            $author = Author::where('name', $author_name)->first();
            //checking if author is in database 
            if($author)  
            {    
                //reading author qoutes 
                $qoutes = $author->qoute()->OrderBy('created_at', 'desc')->paginate(6); 
                return view('index', ['qoutes' => $qoutes, 'flag' => false]);
            }
        } 
        
        $qoutes = Qoute::OrderBy('created_at', 'desc')->paginate(6);  //reading all qoutes
        return view('index', ['qoutes' => $qoutes, 'flag' => true]);
    }

    public function postQoute(Request $request) {

        //validation
        $this->validate($request, [
            'author' => 'required|max:40|alpha', 
            'qoute' => 'required|max:500'
        ]);

        $author_name = ucfirst($request['author']);
        $qoute_text = $request['qoute'];
        
        $author = Author::where('name', $author_name)->first();
        //checking if an author is in database
        if(!$author)
        {
            //if author is not in database then it will creat new author
            $author = new Author();
            $author->name = $author_name;
            $author->save();
        }

        $qoute = new Qoute();   
        $qoute->qoute = $qoute_text;
        $author->qoute()->save($qoute); //saving qoute to database

        return redirect()->route('index')->with([
            'success' => 'Qoute Saved'
        ]);
    }

    public function deletePost($qoute_id) {

        $qoute = Qoute::find($qoute_id);
        $msg = "Qoute deleted!";

        if(count($qoute->author->qoute) === 1) {
            $qoute->author->delete();
            $msg = "Qoute and Author deleted!";
        }

        $qoute->delete();

        return redirect()->route('index')->with([
            'success' => $msg
        ]);
    }
}
