<?php

require_once 'config.php';

// Define API functions
function getAllForms() {
    global $conn;
    $sql = "SELECT * FROM forma";
    $result = $conn->query($sql);
    $forms = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $forms[] = $row;
        }
    }
    return $forms;
}

function getForm($id) {
    global $conn;
    $sql = "SELECT * FROM forma WHERE Vartotojo_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return [];
    }
}

function addForm($data) {
    global $conn;
    $sql = "INSERT INTO forma (Uzpildymo_data, Suvartojimas, Elektros_tiekejo_kaina, Rekomenduojama_galia, Montavimo_vieta, Stogo_slaito_puse, Seselio_kiekis, Stogo_danga, Elektros_ivadas, Ivado_galia, Atsiskaitymas, Valstybes_parama, Vardas, Pavarde, Tel_Nr, El_pastas, Gatve, Namo_nr, Miestas, Imones_pavadinimas, Zinute) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdissssssssssss", $data['Uzpildymo_data'], $data['Suvartojimas'], $data['Elektros_tiekejo_kaina'], $data['Rekomenduojama_galia'], $data['Montavimo_vieta'], $data['Stogo_slaito_puse'], $data['Seselio_kiekis'], $data['Stogo_danga'], $data['Elektros_ivadas'], $data['Ivado_galia'], $data['Atsiskaitymas'], $data['Valstybes_parama'], $data['Vardas'], $data['Pavarde'], $data['Tel_Nr'], $data['El_pastas'], $data['Gatve'], $data['Namo_nr'], $data['Miestas'], $data['Imones_pavadinimas'], $data['Zinute']);
    return $stmt->execute();
}

function updateForm($id, $data) {
    global $conn;
    $sql = "UPDATE forma SET Uzpildymo_data=?, Suvartojimas=?, Elektros_tiekejo_kaina=?, Rekomenduojama_galia=?, Montavimo_vieta=?, Stogo_slaito_puse=?, Seselio_kiekis=?, Stogo_danga=?, Elektros_ivadas=?, Ivado_galia=?, Atsiskaitymas=?, Valstybes_parama=?, Vardas=?, Pavarde=?, Tel_Nr=?, El_pastas=?, Gatve=?, Namo_nr=?, Miestas=?, Imones_pavadinimas=?, Zinute=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdisssssssssssssi", $data['Uzpildymo_data'], $data['Suvartojimas'], $data['Elektros_tiekejo_kaina'], $data['Rekomenduojama_galia'], $data['Montavimo_vieta'], $data['Stogo_slaito_puse'], $data['Seselio_kiekis'], $data['Stogo_danga'], $data['Elektros_ivadas'], $data['Ivado_galia'], $data['Atsiskaitymas'], $data['Valstybes_parama'], $data['Vardas'], $data['Pavarde'], $data['Tel_Nr'], $data['El_pastas'], $data['Gatve'], $data['Namo_nr'], $data['Miestas'], $data['Imones_pavadinimas'], $data['Zinute'], $id);
    return $stmt->execute();
}

function deleteForm($id) {
    global $conn;
    $sql = "DELETE FROM forma WHERE Vartotojo_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Handle API requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'getAllForms':
                header('Content-Type: application/json; charset=UTF-8');
                echo json_encode(getAllForms());
                break;
            case 'getForm':
                if (isset($_GET['Vartotojo_id'])) {
                    $id = intval($_GET['Vartotojo_id']);
                    header('Content-Type: application/json; charset=UTF-8');
                    echo json_encode(getForm($id));
                } else {
                    header('HTTP/1.1 400 Bad Request');
                    echo json_encode(array('error' => 'Missing Vartotojo_id parameter'));
                }
                break;
            default:
                header('HTTP/1.1 404 Not Found');
                echo json_encode(array('error' => 'Invalid action parameter'));
                break;
        }
    } else {
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(array('error' => 'Missing action parameter'));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'addForm') {
        $data = $_POST;
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode(addForm($data));
    } else {
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(array('error' => 'Invalid request'));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    if (isset($_GET['action']) && isset($_GET['Vartotojo_id'])) {
        $id = intval($_GET['Vartotojo_id']);
        $data = $_PUT;
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode(updateForm($id, $data));
    } else {
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(array('error' => 'Invalid request'));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    var_dump($_GET);
    var_dump($_SERVER);
    $id = intval($_GET['Vartotojo_id']);

    if (isset($_GET['action']) && isset($_GET['Vartotojo_id'])) {
        $id = intval($_GET['Vartotojo_id']);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode(deleteForm($id));
    } else {
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(array('error' => 'Invalid request'));
    }
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(array('error' => 'Invalid request method'));
}

?>