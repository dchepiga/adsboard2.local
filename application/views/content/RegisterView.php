<div class="row">
    <div class="col-md-4">
        <form role="form" action = "/index.php?action=registration" method = "post">
            <!--            <form role="form" action = "/index.php?action=registration" method = "post">-->
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="input-email" placeholder="Enter email" name = "input-email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="input-name" placeholder="Enter your name" name = "input-name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="input-password" placeholder="Password" name = "input-password">
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>