<?php

namespace App\Services\Embedded;

use App\Helpers\MediaUploader;
use App\Repository\CommentRepository;
use App\Repository\ReactionRepository;
use App\Repository\StoreRepository;
use App\Repository\TopicRepository;

class TopicService extends AbstractEmbedService
{
    protected $storeRepository;
    protected $topicRepository;
    protected $commentRepository;
    protected $reactionRepository;

    public function __construct(
        StoreRepository $storeRepository,
        TopicRepository $topicRepository,
        ReactionRepository $reactionRepository,
        CommentRepository $commentRepository
    ) {
        $this->storeRepository = $storeRepository;
        $this->topicRepository = $topicRepository;
        $this->commentRepository = $commentRepository;
        $this->reactionRepository = $reactionRepository;
    }

    public function getList($store, $filters)
    {
        $limit = $filters['per_page'] ?? 10;
        $result = $this->topicRepository->getList($store->id, $filters, $limit);
        $listReaction = $this->reactionRepository->getList(['type' => 'topic']);
        $comment = $this->commentRepository->allComment($store->id);
        foreach ($result as $key => $topic) {
            $result[$key]['images'] = json_decode($topic['images']);
            $result[$key]['count_reaction'] = collect($listReaction)->where('item_id', $topic['id'])->count() ?? 0;
            $dataReaction = collect($listReaction)->where('item_id', $topic['id'])->where('store_id', $store->id)->first();
            $result[$key]['reaction'] = isset($dataReaction['like']) && $dataReaction['like'] == 1 ? 1 : 0;
            $result[$key]['count_comment'] = collect($comment)->where('topic_id', $topic['id'])->count() ?? 0;
        }
        return $this->setData($result);
    }

    public function detail($topicId, $store)
    {
        $result = $this->topicRepository->getDetail($topicId);
        $listReaction = $this->reactionRepository->getList(['type' => 'topic']);
        $result['images'] = json_decode($result['images']);
        $result['count_reaction'] = collect($listReaction)->where('item_id', $topicId)->count() ?? 0;
        $dataReaction = collect($listReaction)->where('item_id', $topicId)->where('store_id', $store->id)->first();
        $result['reaction'] = isset($dataReaction['like']) && $dataReaction['like'] == 1 ? 1 : 0;
        $result['count_comment'] = $this->commentRepository->countByTopic($topicId);
        return $this->setData($result);
    }

    public function createTopic($store, $data)
    {
        $dataSave = [
            'store_id' => $store->id,
            'title' => @$data['title'],
            'author' => $store->name,
            'description' => @$data['description'],
            'status' => 'planning',
            'approved' => 0,
            'type' => $data['type'],
        ];
        if (!empty($data['images'])) {
            $dataSave['images'] = json_encode($data['images']);
        }
        $result = $this->topicRepository->create($dataSave);
        return $this->setData($result);
    }

    public function reaction($store, $itemId, $type, $reaction)
    {
        $data = array_intersect_key($reaction, array_flip(['like']));
        if (reset($data) == 0) {
            $result = $this->reactionRepository->deleteBy(['type' => $type, 'item_id' => $itemId, 'store_id' => $store->id]);
            return $this->setData($result);
        }
        $result = $this->reactionRepository->updateOrCreate(['type' => $type, 'item_id' => $itemId, 'store_id' => $store->id], $data);
        return $this->setData($result);
    }


    public function getListComment($store, $commentId, $filters)
    {
        $limit = $filters['per_page'] ?? 10;
        $result = $this->commentRepository->getList($store->id, $commentId, $filters, $limit);
        $listReaction = $this->reactionRepository->getList(['type' => 'comment']);
        foreach ($result as $key => $topic) {
            $result[$key]['images'] = json_decode($topic['images']);
            $result[$key]['count_reaction'] = collect($listReaction)->where('item_id', $commentId)->count() ?? 0;
            $dataReaction = collect($listReaction)->where('item_id', $commentId)->where('store_id', $store->id)->first();
            $result[$key]['reaction'] = isset($dataReaction['like']) && $dataReaction['like'] == 1 ? 1 : 0;
        }
        return $this->setData($result);
    }

    public function createComment($store, $topicId, $data)
    {
        $dataSave = [
            'store_id' => (int)$store->id,
            'topic_id' => (int) $topicId,
            'title' => @$data['title'],
            'author' => $store->name,
            'description' => @$data['description'],
            'approved' => 0,
            'replied_to' => @$data['replied_to'],
        ];
        if (!empty($data['images'])) {
            $dataSave['images'] = json_encode($data['images']);
        }
        $result = $this->commentRepository->create($dataSave);
        return $this->setData($result);
    }

    public function reactionComment($store, $commentId, $reaction)
    {
        $data = array_intersect_key($reaction, array_flip(['like']));
        if (reset($data) == 0) {
            $result = $this->reactionRepository->delete(['type' => 'comment', 'item_id' => $commentId, 'store_id' => $store->id]);
            return $this->setData($result);
        }
        $result = $this->reactionRepository->updateOrCreate(['type' => 'comment', 'item_id' => $commentId, 'store_id' => $store->id], $data);
        return $this->setData($result);
    }

    public function uploadImage($store, $images)
    {
        $result = [];
        foreach ($images as $key => $image) {
            $filename = 'topic_' . $store->id . '_' . time() . '.jpg';

            $fileUpload = MediaUploader::saveToS3($image['file'], 'topic', $filename);
            if ($fileUpload) {
                $result[$key] = app(\App\Helpers\MediaUploader::class)->getSrcFromS3($fileUpload);
            }
        }
        return $this->setData(array_values($result));
    }

    public function deleteImages($imagesUrls)
    {
        foreach ($imagesUrls as $imagesUrl) {
            app(\App\Helpers\MediaUploader::class)->deleteFileFromS3($imagesUrl);
        }
        return $this->setData('success');
    }
}
