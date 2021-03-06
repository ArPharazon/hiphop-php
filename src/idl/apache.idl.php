<?php
/**
 * Automatically generated by running "php schema.php apache".
 *
 * You may modify the file, but re-running schema.php against this file will
 * standardize the format without losing your schema changes. It does lose
 * any changes that are not part of schema. Use "note" field to comment on
 * schema itself, and "note" fields are not used in any code generation but
 * only staying within this file.
 */
///////////////////////////////////////////////////////////////////////////////
// Preamble: C++ code inserted at beginning of ext_{name}.h

DefinePreamble(<<<CPP

CPP
);

///////////////////////////////////////////////////////////////////////////////
// Constants
//
// array (
//   'name' => name of the constant
//   'type' => type of the constant
//   'note' => additional note about this constant's schema
// )


///////////////////////////////////////////////////////////////////////////////
// Functions
//
// array (
//   'name'   => name of the function
//   'desc'   => description of the function's purpose
//   'flags'  => attributes of the function, see base.php for possible values
//   'opt'    => optimization callback function's name for compiler
//   'note'   => additional note about this function's schema
//   'return' =>
//      array (
//        'type'  => return type, use Reference for ref return
//        'desc'  => description of the return value
//      )
//   'args'   => arguments
//      array (
//        'name'  => name of the argument
//        'type'  => type of the argument, use Reference for output parameter
//        'value' => default value of the argument
//        'desc'  => description of the argument
//      )
// )

DefineFunction(
  array(
    'name'   => "apache_note",
    'desc'   => "This function is a wrapper for Apache's table_get and table_set. It edits the table of notes that exists during a request. The table's purpose is to allow Apache modules to communicate.\n\nThe main use for apache_note() is to pass information from one module to another within the same request.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "If called with one argument, it returns the current value of note note_name. If called with two arguments, it sets the value of note note_name to note_value and returns the previous value of note note_name. If the note cannot be retrieved, FALSE is returned.",
    ),
    'args'   => array(
      array(
        'name'   => "note_name",
        'type'   => String,
        'desc'   => "The name of the note.",
      ),
      array(
        'name'   => "note_value",
        'type'   => String,
        'value'  => "null_string",
        'desc'   => "The value of the note.",
      ),
    ),
    'taint_observer' => false,
  ));

DefineFunction(
  array(
    'name'   => "apache_request_headers",
    'desc'   => "Fetches all HTTP request headers from the current request. This function is only supported when PHP is installed as an Apache module.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => StringVec,
      'desc'   => "An associative array of all the HTTP headers in the current request, or FALSE on failure.",
    ),
    'taint_observer' => array(
      'set_mask'   => "TAINT_BIT_ALL",
      'clear_mask' => "TAINT_BIT_NONE",
    ),
  ));

DefineFunction(
  array(
    'name'   => "apache_response_headers",
    'desc'   => "Fetch all HTTP response headers.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => StringVec,
      'desc'   => "An array of all Apache response headers on success or FALSE on failure.",
    ),
    'taint_observer' => array(
      'set_mask'   => "TAINT_BIT_ALL",
      'clear_mask' => "TAINT_BIT_NONE",
    ),
  ));

DefineFunction(
  array(
    'name'   => "apache_setenv",
    'desc'   => "apache_setenv() sets the value of the Apache environment variable specified by variable.\n\nWhen setting an Apache environment variable, the corresponding \$_SERVER variable is not changed.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Boolean,
      'desc'   => "Returns TRUE on success or FALSE on failure.",
    ),
    'args'   => array(
      array(
        'name'   => "variable",
        'type'   => String,
        'desc'   => "The environment variable that's being set.",
      ),
      array(
        'name'   => "value",
        'type'   => String,
        'desc'   => "The new variable value.",
      ),
      array(
        'name'   => "walk_to_top",
        'type'   => Boolean,
        'value'  => "false",
        'desc'   => "Whether to set the top-level variable available to all Apache layers.",
      ),
    ),
    'taint_observer' => false,
  ));

DefineFunction(
  array(
    'name'   => "getallheaders",
    'desc'   => "Fetches all HTTP headers from the current request.\n\nThis function is an alias for apache_request_headers(). Please read the apache_request_headers() documentation for more information on how this function works. This function is only supported when PHP is installed as an Apache module.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => StringVec,
      'desc'   => "An associative array of all the HTTP headers in the current request, or FALSE on failure.",
    ),
    'taint_observer' => array(
      'set_mask'   => "TAINT_BIT_ALL",
      'clear_mask' => "TAINT_BIT_NONE",
    ),
  ));

DefineFunction(
  array(
    'name'   => "virtual",
    'desc'   => "virtual() is an Apache-specific function which is similar to <!--#include virtual...--> in mod_include. It performs an Apache sub-request. It is useful for including CGI scripts or .shtml files, or anything else that you would parse through Apache. Note that for a CGI script, the script must generate valid CGI headers. At the minimum that means it must generate a Content-Type header.\n\nTo run the sub-request, all buffers are terminated and flushed to the browser, pending headers are sent too. This function is only supported when PHP is installed as an Apache module.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Boolean,
      'desc'   => "Performs the virtual command on success, or returns FALSE on failure.",
    ),
    'args'   => array(
      array(
        'name'   => "filename",
        'type'   => String,
        'desc'   => "The file that the virtual command will be performed on.",
      ),
    ),
    'taint_observer' => false,
  ));

DefineFunction(
  array(
    'name'   => "apache_get_config",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
    ),
    'taint_observer' => false,
  ));

DefineFunction(
  array(
    'name'   => "apache_get_scoreboard",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
    ),
    'taint_observer' => false,
  ));

DefineFunction(
  array(
    'name'   => "apache_get_rewrite_rules",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
    ),
    'taint_observer' => false,
  ));


///////////////////////////////////////////////////////////////////////////////
// Classes
//
// BeginClass
// array (
//   'name'   => name of the class
//   'desc'   => description of the class's purpose
//   'flags'  => attributes of the class, see base.php for possible values
//   'note'   => additional note about this class's schema
//   'parent' => parent class name, if any
//   'ifaces' => array of interfaces tihs class implements
//   'bases'  => extra internal and special base classes this class requires
//   'footer' => extra C++ inserted at end of class declaration
// )
//
// DefineConstant(..)
// DefineConstant(..)
// ...
// DefineFunction(..)
// DefineFunction(..)
// ...
// DefineProperty
// DefineProperty
//
// array (
//   'name'  => name of the property
//   'type'  => type of the property
//   'flags' => attributes of the property
//   'desc'  => description of the property
//   'note'  => additional note about this property's schema
// )
//
// EndClass()

