<?php
/**
 * Events Controller for The Way of Hope
 */

require_once '../app/core/BaseController.php';

class EventsController extends BaseController {
    
    public function index() {
        // Get filter parameters
        $type = $_GET['type'] ?? '';
        $month = $_GET['month'] ?? date('Y-m');
        
        // Build query
        $whereClause = "WHERE is_active = 1";
        $params = [];
        
        if ($type) {
            $whereClause .= " AND event_type = ?";
            $params[] = $type;
        }
        
        if ($month) {
            $whereClause .= " AND DATE_FORMAT(event_date, '%Y-%m') = ?";
            $params[] = $month;
        }
        
        // Get events
        $events = $this->db->fetchAll("SELECT * FROM events {$whereClause} ORDER BY event_date ASC", $params);
        
        // Get event types for filter
        $eventTypes = $this->db->fetchAll("SELECT DISTINCT event_type FROM events WHERE is_active = 1");
        
        $data = [
            'events' => $events,
            'eventTypes' => $eventTypes,
            'currentType' => $type,
            'currentMonth' => $month,
            'pageTitle' => $this->translate('nav_events', 'Events')
        ];
        
        $this->render('events/index', $data);
    }
}
