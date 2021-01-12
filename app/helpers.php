<?php

function generateReferenceId()
{
  return uniqid();
}

function general_error_message($message)
{
  return  array(
    'status' => false,
    'message' => $message
  );
}