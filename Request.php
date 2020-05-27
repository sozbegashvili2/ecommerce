<?php
namespace app;
class Request implements IRequest
{
    public function __construct()
    {
        foreach ($_SERVER as $key => $value) {
            $camelCased = $this->toCamelCase($key);
            $this->{$camelCased} = $value;
        }
    }

    public function toCamelCase($key)
    {
        $result = strtolower($key);
        preg_match_all('/_[a-z]/',$result,$matches);
        foreach ($matches[0] as $match) {
            $c = str_replace('_','',strtoupper($match));
            $result = str_replace($match,$c,$result);
        }
        return $result;
    }
public function getPath()
{
    return $this->pathInfo ?? '/';
}
public function getBody()
{
    if ($this->getMethod() === 'GET') {
        $body = [];
        foreach ($_GET as $key => $value){
            $body[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $body;
    }
    if ($this->getMethod() === 'POST') {
        $body = [];
        foreach ($_POST as $key => $value) {
            $body[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $body;
    }
}
public function getMethod()
{
    return $this->requestMethod;
}
}