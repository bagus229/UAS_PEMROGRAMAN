<?php
require_once __DIR__ . '/../../config/session.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class EventController {

    /* ================= DASHBOARD ================= */
    public function dashboard() {
        if (!isset($_SESSION['login'])) {
            header("Location: ".BASE_URL."/login");
            exit;
        }

        require 'app/views/dashboard.php';
    }

    /* ================= LIST EVENT (ADMIN & USER) ================= */
    public function index() {
        if (!isset($_SESSION['login'])) {
            header("Location: ".BASE_URL."/login");
            exit;
        }

        $db = Database::connect();
        $q = $_GET['q'] ?? '';

        $total = $db->query("
            SELECT COUNT(*) AS total 
            FROM events 
            WHERE nama_event LIKE '%$q%'
        ")->fetch_assoc()['total'];

        $pages = 3;
        $limit = ceil($total / $pages);
        if ($limit < 1) $limit = 1;

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        if ($page > $pages) $page = $pages;

        $start = ($page - 1) * $limit;

        $sql = "
            SELECT * FROM events
            WHERE nama_event LIKE '%$q%'
            ORDER BY tanggal DESC
            LIMIT $start, $limit
        ";
        $events = $db->query($sql);

        if (!$events) {
            die("SELECT ERROR: " . $db->error);
        }

        // ADMIN & USER DIBEDAKAN DI VIEW
        if ($_SESSION['role'] === 'admin') {
            require 'app/modules/admin/event_list.php';
        } else {
            require 'app/modules/user/event_list_user.php';
        }
    }

    /* ================= CREATE (ADMIN ONLY) ================= */
    public function create() {

        if ($_SESSION['role'] !== 'admin') {
            die("Akses ditolak!");
        }

        require 'app/modules/admin/event_add.php';
    }

    public function store() {

        if ($_SESSION['role'] !== 'admin') {
            die("Akses ditolak!");
        }

        $db = Database::connect();
        Event::create($db, $_POST);

        header("Location: ".BASE_URL."/event");
        exit;
    }

    /* ================= EDIT (ADMIN ONLY) ================= */
    public function edit($id) {

        if ($_SESSION['role'] !== 'admin') {
            die("Akses ditolak!");
        }

        $db = Database::connect();
        $event = $db->query("SELECT * FROM events WHERE id='$id'")->fetch_assoc();

        require 'app/modules/admin/event_edit.php';
    }

    public function update($id) {

        if ($_SESSION['role'] !== 'admin') {
            die("Akses ditolak!");
        }

        $db = Database::connect();

        $sql = "UPDATE events SET
                nama_event = '{$_POST['nama']}',
                tanggal = '{$_POST['tanggal']}',
                lokasi = '{$_POST['lokasi']}',
                deskripsi = '{$_POST['deskripsi']}'
                WHERE id = $id";

        if (!$db->query($sql)) {
            die($db->error);
        }

        header("Location: ".BASE_URL."/event");
        exit;
    }

    /* ================= DELETE (ADMIN ONLY) ================= */
    public function delete($id) {

        if ($_SESSION['role'] !== 'admin') {
            die("Akses ditolak!");
        }

        $db = Database::connect();
        if (!$db->query("DELETE FROM events WHERE id = $id")) {
            die($db->error);
        }

        header("Location: ".BASE_URL."/event");
        exit;
    }
}
