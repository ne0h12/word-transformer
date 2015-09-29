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
        $visited = $this->fillUnvisitedVertexes($graphNodes);

        $queue = $this->createQueue($fromVertex);
        $visited[$fromVertex] = true;

        $transitions = [];
        $transitions[$fromVertex] = $this->createTransitionsList($fromVertex);

        while ($this->notReached($toVertex, $queue)) {
            $vertex = $queue->dequeue();

            if ($this->vertexExists($graphNodes, $vertex)) {
                foreach ($graphNodes[$vertex] as $relatedVertex) {
                    if (!$visited[$relatedVertex]) {
                        $queue->enqueue($relatedVertex);
                        $visited[$relatedVertex] = true;
                        $transitions[$relatedVertex] = clone $transitions[$vertex];
                        $transitions[$relatedVertex]->push($relatedVertex);
                    }
                }
            }
        }

        return isset($transitions[$toVertex]) ? $this->toArray($transitions[$toVertex]) : [];
    }

    /**
     * @param \SplDoublyLinkedList $paths
     * @return array
     */
    private function toArray(\SplDoublyLinkedList $paths)
    {
        $transitions = [];
        foreach ($paths as $transition) {
            $transitions[] = $transition;
        }

        return $transitions;
    }

    /**
     * @param $vertex
     * @return \SplDoublyLinkedList
     */
    public function createTransitionsList($vertex)
    {
        $list = new \SplDoublyLinkedList();
        $list->setIteratorMode(
            \SplDoublyLinkedList::IT_MODE_FIFO|\SplDoublyLinkedList::IT_MODE_KEEP
        );
        $list->push($vertex);

        return $list;
    }

    /**
     * @param $fromVertex
     * @return \SplQueue
     */
    private function createQueue($fromVertex)
    {
        $queue = new \SplQueue();
        $queue->enqueue($fromVertex);

        return $queue;
    }

    /**
     * @param array $graphNodes
     * @param mixed $vertex
     * @return bool
     */
    private function vertexExists($graphNodes, $vertex)
    {
        return !empty($graphNodes[$vertex]);
    }

    /**
     * @param $toVertex
     * @param \SplQueue $queue
     * @return bool
     */
    private function notReached($toVertex, $queue)
    {
        return !$queue->isEmpty() && $queue->bottom() != $toVertex;
    }

    /**
     * @param $graphNodes
     * @return array
     */
    private function fillUnvisitedVertexes($graphNodes)
    {
        $visited = [];
        foreach ($graphNodes as $relatedVertex => $relatedVertexes) {
            $visited[$relatedVertex] = false;
        }

        return $visited;
    }
}