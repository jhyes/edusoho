<?php

namespace Topxia\DataTag;

use Topxia\DataTag\DataTag;

class LatestCourseReviewsDataTag extends CourseBaseDataTag implements DataTag  
{
    
    /**
     * 获取最新发表的课程评论列表
     *
     * 可传入的参数：
     *   courseId 可选 课程ID
     *   count 必需 课程话题数量，取值不能超过100
     * 
     * @param  array $arguments 参数
     * @return array 课程评论
     */

    public function getData(array $arguments)
    {
        
        $this->checkCount($arguments);

        if (empty($arguments['courseId'])){
            $conditions = array();
        } else {
            $conditions = array('courseId' => $arguments['courseId']);
        }
    	$courseReviews = $this->getReviewService()->searchReviews($conditions, $sort = 'latest', 0, $arguments['count']);

        return $this->foreachReviews($courseReviews);
    }

}

