<?php
namespace AdinanCenci\AetherMusic\Source;

class Resource 
{
    protected string $vendor = '';

    /**
     * Identifier withing the vendor.
     */
    protected string $id = '';

    protected string $title = '';

    protected string $description = '';

    /**
     * An url to a thumbnail picture.
     */
    protected string $thumbnail = '';

    /**
     * An url to a playable multimedia.
     */
    protected string $source = '';

    public function __construct(
        string $vendor,
        string $id,
        ?string $title,
        ?string $description = '',
        ?string $thumbnail = '',
        ?string $source = ''
    ) 
    {
        $this->vendor      = $vendor;
        $this->id          = $id;
        $this->title       = $title;
        $this->description = $description;
        $this->thumbnail   = $thumbnail;
        $this->source      = $source;
    }

    public function __get($var) 
    {
        return isset($this->{$var})
            ? $this->{$var} 
            : null;
    }

    public function __isset($var) 
    {
        return isset($this->{$var});
    }

    public function toArray() : array
    {
        $array = [];

        if (!empty($this->vendor)) {
            $array['vendor'] = $this->vendor;
        }

        if (!empty($this->id)) {
            $array['id'] = $this->id;
        }

        if (!empty($this->title)) {
            $array['title'] = $this->title;
        }

        if (!empty($this->description)) {
            $array['description'] = $this->description;
        }

        if (!empty($this->thumbnail)) {
            $array['thumbnail'] = $this->thumbnail;
        }

        if (!empty($this->source)) {
            $array['source'] = $this->source;
        }

        return $array;
    }

    /**
     * @param string[] $array
     *
     * @return Resource
     */
    public static function createFromArray(array $array) : Resource
    {
        return new self(
            !empty($array['vendor']) ? $array['vendor'] : '',
            !empty($array['id']) ? $array['id'] : '',
            !empty($array['title']) ? $array['title'] : '',
            !empty($array['description']) ? $array['description'] : '',
            !empty($array['thumbnail']) ? $array['thumbnail'] : '',
            !empty($array['source']) ? $array['source'] : ''
        );
    }
}