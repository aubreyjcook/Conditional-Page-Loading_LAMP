<?php
/* variable declarations
 ------------------------------------------------------------- */

/* this gets the current working document name and extension as a variable, eg. "index.php" */
$current_page = basename($_SERVER['PHP_SELF']);
/* this gets the page name without the extension: eg. 'index.php' = 'index' */
$current_doc_name = preg_replace('/\.[^.]+$/','',$current_page);


/* function/method declarations
 ------------------------------------------------------------- */

/* this function is used to load a CSS file from a local external stylesheet, the function checks for the existence of the file in the css/* directory and loads it if it exists*/
function loadCSSFile($fileName){
  if (file_exists("css/" . $fileName . '.css')){
    echo '<link href="css/' . $fileName . '.css" rel="stylesheet">';
  }
}

/* this function takes two parameters and is used to load a css file from a CDN, the first parameter is the raw CDN url, the second is the subresource integrity SHA hash*/
function loadCSSCDN($href, $sri=null){
  if($sri != null){
      echo '<link rel="stylesheet" href="' . $href . '" integrity="' . $sri . '" crossorigin="anonymous">';
  } else {
      echo '<link rel="stylesheet" href="' . $href . '" crossorigin="anonymous">';
  }

}

/* this function is used to load a Javascript file from a local external JS script, the function checks for the existence of the file in the js/* directory and loads it if it exists*/
function loadJSFile($fileName){
  if (file_exists("js/" . $fileName . '.js')){
    echo '<script src="js/' . $fileName . '.js"></script>';

  }
}

/* this function takes two parameters and is used to load a Javascript file from a CDN, the first parameter is the raw CDN url, the second is the subresource integrity SHA hash*/
function loadJSCDN($href, $sri=null){
  if($sri != null){
      echo '<script src="' . $href . '" integrity="' . $sri . '" crossorigin="anonymous"></script>';
  } else {
      echo '<script src="' . $href . '" crossorigin="anonymous"></script>';
  }

}

/*checks for an element in the page with a class name of the given parameter*/
function checkForClassElement($class){
  // TODO: Fix this
  
  $domdocument = new DOMDocument();
  $domdocument->loadHTMLFile("index.php");
  $a = new DOMXPath($domdocument);
  $spans = $a->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");

  for ($i = $spans->length - 1; $i > -1; $i--) {
        $result[] = $spans->item($i)->firstChild->nodeValue;
    }

    echo "<pre>";
    print_r($result);
}

/*checks for an element in the page with an ID name of the given parameter*/
function checkForIDElement($ID){

}
?>
