<?php

namespace Netemedia\Component;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\View\View;
use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;

abstract class Component
{
    private array $skipMethods = [
        '__toString',
    ];

    /**
     * Loads the view with the necessary data and cast it to string.
     *
     * @return string
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function __toString() : string
    {
        return $this->view()->with($this->viewData())->__toString();
    }

    /**
     * Loads the component's view.
     *
     * @return \Illuminate\View\View
     */
    protected function view() : View
    {
        return view("components.{$this->viewName()}");
    }

    /**
     * Returns the view file-name based on the class name.
     *
     * @return string
     */
    protected function viewName() : string
    {
        return Str::kebab(class_basename($this));
    }

    /**
     * Pass class' public properties and public methods to view.
     *
     * @return array
     * @throws \ReflectionException
     */
    protected function viewData() : array
    {
        $viewData = [];

        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ( $properties as $property ) {
            $viewData[ $property->getName() ] = $property->getValue($this);
        }

        $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);
        $methods = Arr::where($methods, fn($method) => ! in_array($method->getName(), $this->skipMethods));
        foreach ( $methods as $method ) {
            $name              = $method->getName();
            $viewData[ $name ] = $method->getClosure($this);
        }

        return $viewData;
    }

    protected static function render() : Component
    {
        return new static;
    }
}
