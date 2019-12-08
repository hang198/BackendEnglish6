<?php


namespace App\services\impl;


use App\Point;
use App\Repositories\PointRepoInterface;
use App\services\PointServiceInterface;

class PointServiceImpl implements PointServiceInterface
{
    protected $pointRepo;

    public function __construct(PointRepoInterface $pointRepo)
    {
        $this->pointRepo = $pointRepo;
    }

    public function create($request)
    {
        $questions = json_decode($request->data);
        $point = 0;
        foreach ($questions as $question) {
            $isCorrect = $this->calculatorPoint($question->options);
            if ($isCorrect) {
                $point++;
            }
            foreach ($question->options as $answer) {
                $data[$answer->id] = ($answer->selected) ? ['selected' => $answer->selected] : ['selected' => 0];
            }
        }
        $currentUser = $request->currentUser;
        $practice_id = $request->practice_id;
        $result = $this->pointRepo->create(['point' => $point, 'user_id' => $currentUser, 'practice_id' => $practice_id]);
        $result->answers()->attach($data);
        return $result;
    }

    public function getById($id)
    {
        $point = $this->pointRepo->getById($id);
        $point->user;
        $practice = $point->practice;
        $questions = $practice->questions;
        $selected = $point->selected;
        foreach ($questions as $question) {
            $answers = [];
            foreach ($question->answers as $answer) {
                $item = [
                    'id' => $answer->id,
                    'content' => $answer->content,
                    'selected' => 0,
                    'isAnswer' => $answer->correct
                ];
                foreach ($selected as $value) {
                    if ($value->answer_id === $answer->id) {
                        $item['selected'] = $value->selected;
                    }
                }
                $answers[] = $item;
            }
            $data[] = ['question' => $question, 'answers' => $answers];
        }
        $items = ['point' => $point, 'questions' => $data, 'practice' => $practice];
        return $items;
    }

    public function calculatorPoint($answers)
    {
        $count = 0;
        foreach ($answers as $answer) {
            if ($answer->selected) {
                $count++;
                if (!$answer->isAnswer) {
                    $count = 0;
                }
            }
        }
        return ($count !== 0) ? true : false;
    }

    public function delete($id)
    {
        $points = $this->pointRepo->getByPracticeId($id);
        foreach ($points as $point) {
            $this->pointRepo->delete($point);
        }
    }

    public function getPointsMaxByUserID($id)
    {
        return $this->getPoints('user_id', $id, 'point', 'practice');
    }

    public function getPointsByTime($id)
    {
        return $this->getPoints('user_id', $id, 'created_at', 'practice','practice');
    }

    public function getPointsOfPracticeByTime($id)
    {
        return $this->getPoints('practice_id', $id, 'created_at', 'user','practice');
    }

    public function getPointsOfPracticeSort($id)
    {
        return $this->getPoints('practice_id', $id, 'point', 'user');
    }

    public function getPoints($column, $id, $oderByColumn, $include, $include2 = null)
    {
        $points = Point::query()->newQuery()->where($column, "=", $id)->orderByDesc($oderByColumn);
        $arrayPoints = $this->pointRepo->getPoint($points);
        foreach ($arrayPoints as $point) {
            $item = ['point' => $point->point,
                $include => $point->$include,
                $include2 => $point->$include2,
            ];
            $data[] = $item;
        }

        return $data;
    }
}


