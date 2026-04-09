<?php
class MatchEngine {
    private $tutors;

    public function __construct($tutorData) {
        $this->tutors = $tutorData;
    }

    public function getMatchedTutors($userFeatures) {
        if (empty($userFeatures)) {
            foreach ($this->tutors as &$tutor) { $tutor['score'] = 0; }
            return $this->tutors;
        }

        foreach ($this->tutors as &$tutor) {
            // หาจุดที่ Tag ติวเตอร์ ตรงกับสิ่งที่ User เลือก
            $intersect = array_intersect($userFeatures, $tutor['tags']);
            $score = (count($intersect) / count($userFeatures)) * 100;
            $tutor['score'] = round($score);
        }

        // เรียงลำดับจากคะแนนมากไปน้อย
        usort($this->tutors, function($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        return $this->tutors;
    }
}
?>
