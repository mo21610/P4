<?php
class Session {
    public function setFlash($message,$type = 'success') {
        $_SESSION['flash'] = array(
            'message' => $message,
            'type' => $type
        );
    }
    public function flash() {
        if(isset($_SESSION['flash'])) { ?>
            <div id="alert" class="alert alert-<?php echo $_SESSION['flash']['type']; ?>" role="alert">
                <?php echo $_SESSION['flash']['message']; ?>
            </div>
            <?php
            unset($_SESSION['flash']);
        }
    }
}