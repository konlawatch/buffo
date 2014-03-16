<?php

/*
 * author by konlawatch
 */

class Controller_services_markdown extends Controller {

    public function action_index() {
        $string = '# About Markdown

Markdown is a text-to-HTML conversion tool for web writers.
Markdown allows you to write using an easy-to-read, easy-to-write
plain text format, then convert it to structurally valid HTML.

* It features bullet points
* As well as other handy features
* DDDD
* ddd*


>dfdf';

        $data = Markdown::parse($string);

        echo '<p>';
        print_r($data);
        echo '</p>';
    }

}
