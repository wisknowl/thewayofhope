<?php
/**
 * Programs Controller for The Way of Hope
 */

require_once '../app/core/BaseController.php';

class ProgramsController extends BaseController {
    
    public function index() {
        // Get all programs
        $programs = $this->db->fetchAll("SELECT * FROM programs WHERE is_active = 1 ORDER BY created_at DESC");
        
        $data = [
            'programs' => $programs,
            'pageTitle' => $this->translate('programs_title', 'Our Programs')
        ];
        
        $this->render('programs/index', $data);
    }
    
    public function education() {
        $program = $this->getProgram('education');
        $data = [
            'program' => $program,
            'pageTitle' => $this->translate('program_education', 'Education Program')
        ];
        
        $this->render('programs/education', $data);
    }
    
    public function health() {
        $program = $this->getProgram('health');
        $data = [
            'program' => $program,
            'pageTitle' => $this->translate('program_health', 'Health Awareness Program')
        ];
        
        $this->render('programs/health', $data);
    }
    
    public function vocational() {
        $program = $this->getProgram('vocational');
        $data = [
            'program' => $program,
            'pageTitle' => $this->translate('program_vocational', 'Vocational Training Program')
        ];
        
        $this->render('programs/vocational', $data);
    }
    
    public function rights() {
        $program = $this->getProgram('rights');
        $data = [
            'program' => $program,
            'pageTitle' => $this->translate('program_rights', 'Rights Defense Program')
        ];
        
        $this->render('programs/rights', $data);
    }
    
    public function disability() {
        $program = $this->getProgram('disability');
        $data = [
            'program' => $program,
            'pageTitle' => $this->translate('program_disability', 'Disability Inclusion Program')
        ];
        
        $this->render('programs/disability', $data);
    }
    
    private function getProgram($type) {
        $programMap = [
            'education' => 1,
            'health' => 2,
            'vocational' => 3,
            'rights' => 4,
            'disability' => 5
        ];
        
        $programId = $programMap[$type] ?? 1;
        return $this->db->fetch("SELECT * FROM programs WHERE id = ?", [$programId]);
    }
}
