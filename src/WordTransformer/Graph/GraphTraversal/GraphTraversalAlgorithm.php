<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Graph\GraphTraversal;

use WordTransformer\Graph\Graph;

interface GraphTraversalAlgorithm
{
    /**
     * @param Graph $graph
     * @param $fromVertex
     * @param $toVertex
     * @return mixed
     */
    public function traversal(Graph $graph, $fromVertex, $toVertex );
}