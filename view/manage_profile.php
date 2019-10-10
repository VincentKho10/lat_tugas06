<form method="POST" style="padding: 10% 25%">
    <fieldset>
        <legend>Update Profile</legend>
        <label for="inpUname">Username:</label><br>
        <input type="text" id="inpUname" name="Uname" placeholder="input your new username" style="width:200px;">
        <fieldset>
            <legend>change password</legend>
            <div>
                <label for="inpPass">Password:</label><br>
                <input type="password" id="inpPass" name="Pass" placeholder="input your new password here" style="width:200px;">
            </div>
            <div>
                <label for="inpConPass">Confirm Password:</label><br>
                <input type="password" id="inpConPass" name="ConPass" placeholder="confirm your new password" style="width:200px;">
            </div>
        </fieldset>
        <button type="submit" name="btnUpdProf">Change!</button>
    </fieldset>
</form>