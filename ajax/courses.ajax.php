<?php
require_once '../database/courses.class.php';
require_once '../database/subject.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    handlePostRequest();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    handleGetRequest();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

function handleGetRequest() {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'get_courses') {
            $courses = (new Courses())->get_courses($_GET['sort'], $_GET['keyword'], $_GET['limit'], $_GET['offset']);
            echo json_encode(['status' => 'success', 'data' => $courses]);
        } elseif ($_GET['action'] === 'get_subjects') {
            $subjects = (new Subject())->get_subjects();
            echo json_encode(['status' => 'success', 'data' => $subjects]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action not provided']);
    }
}
?>

