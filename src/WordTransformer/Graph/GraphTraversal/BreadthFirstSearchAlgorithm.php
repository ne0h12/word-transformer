<?php
/**
 * Author: Klyachin Andrew <sfdiem5@gmail.com>
 */

namespace WordTransformer\Graph\GraphTraversal;

use WordTransformer\Graph\Graph;

class BreadthFirstSearchAlgorithm implements GraphTraversalAlgorithm
{

    public function traversal(Graph $graph, $fromVertex, $toVertex )
    {
        $graphNodes = $graph->getNodes();
        $visited = [];
        foreach ($graphNodes as $vertex => $transitions) {
            $visited[$vertex] = false;
        }

        $queue = new \SplQueue();
        $queue->enqueue($fromVertex);
        $visited[$fromVertex] = true;

        $path = [];
        $path[$fromVertex] = new \SplDoublyLinkedList();
        $path[$fromVertex]->setIteratorMode(
            \SplDoublyLinkedList::IT_MODE_FIFO|\SplDoublyLinkedList::IT_MODE_KEEP
        );

        $path[$fromVertex]->push($fromVertex);

        while (!$queue->isEmpty() && $queue->bottom() != $toVertex) {
            $t = $queue->dequeue();

            if (!empty($graphNodes[$t])) {
                foreach ($graphNodes[$t] as $vertex) {
                    if (!$visited[$vertex]) {
                        $queue->enqueue($vertex);
                        $visited[$vertex] = true;
                        $path[$vertex] = clone $path[$t];
                        $path[$vertex]->push($vertex);
                    }
                }
            }
        }

        return isset($path[$toVertex]) ? $this->toArray($path[$toVertex]) : [];
    }

    private function toArray(\SplDoublyLinkedList $paths)
    {
        $transitions = [];
        foreach ($paths as $transition) {
            $transitions[] = $transition;
        }

        return $transitions;
    }
}