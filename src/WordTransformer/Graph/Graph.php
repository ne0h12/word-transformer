<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Graph;

class Graph
{
    private $nodes = [];

    /**
     * @param $fromVertex
     * @param $toVertex
     */
    public function addRib($fromVertex, $toVertex)
    {
        $this->nodes[$fromVertex][] = $toVertex;
    }

    /**
     * @return array
     */
    public function getNodes()
    {
        return $this->nodes;
    }
}