<?php

// Abstract database element class.
abstract class AbstractEntity 
{
    // Default to -1 for new entities.
    protected int $id = -1;

    // Populate entity upon creation.
    public function __construct(array $data = []) {
        if (!empty($data)) {
            $this->populate($data);
        }
    }

    // Populate entity using assoc array.
    protected function populate(array $data) : void {
        foreach ($data as $key => $value) {
            $method = "set" . str_replace("_", "", ucwords($key, "_")); // snake_case to camelCase.
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Set entity ID.
    public function setId(int $id) : void {
        $this->id = $id;
    }

    // Get entity ID.
    public function getId() : int {
        return $this->id;
    }
}