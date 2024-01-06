<h1>Account Settings</h1>

<div class="question-container">
        <div class="content-area">
            <div class="divide">
                <?php $id = $_SESSION['AccountID'] ?>
                <a href="<?php echo "../php/delete-account.php?ID=$id" ?>" name="delete" id="delete">Delete Account</a>
                <label for="delete">Do you want to delete your account?<br>(Deleting will make you unable to log in again unless you ask for a new account!)</label>
            </div>
        </div>
    </form>
</div>