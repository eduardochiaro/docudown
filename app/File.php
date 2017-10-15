<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class File extends Model
{
    protected $_file = null;
    protected $_html = null;
    protected $_parse = null;

    public function category()
    {
      return $this->belongsTo('App\Category', 'category_id');
    }
    public function prepareData(){

        $path = base_path();

        $folder = $this->category->reference;
        if($this->category->parent){
          $folder = $this->category->parent->reference.DIRECTORY_SEPARATOR .$folder;
        }


        $this->_file = $path.DIRECTORY_SEPARATOR .'documents'.DIRECTORY_SEPARATOR .$folder.DIRECTORY_SEPARATOR .$this->filename;

        $file_content = file_get_contents($this->_file);

        $this->_parse = new Parsedown();

        $this->_html =  $this->_parse->text($file_content);
    }

    public function generateTree(){
      $dom = new \DOMDocument();
      $dom->LoadHTML($this->_html);
      $xpath = new \DOMXPath($dom);
      $nodelist = $xpath->query("//h2|//h3");
      $tree_markdown = [];
      foreach($nodelist as $node){
          $append = '* ';
          if($node->nodeName == 'h3'){
            $append = ' * ';
          }
          $anchor = strtolower(filter_var($node->nodeValue, FILTER_SANITIZE_URL));
          $text = "[".$node->nodeValue."](#".$anchor.")";
          $tree_markdown[] = utf8_decode($append.$text); //gives you the text inside
      }

      return $this->_parse->text(implode("\n",$tree_markdown));
    }
    public function generateHTML(){
      $html = $this->_html;
      $html = preg_replace_callback('/<h([2-3])>(.*?)<\/h([2-3])>/i', function($match){
                return '<h'.$match[1].'><a name="'.strtolower(filter_var($match[2], FILTER_SANITIZE_URL)).'"></a>'.$match[2].'</h'.$match[1].'>';
              }, $html);
      return $html;
    }
}
