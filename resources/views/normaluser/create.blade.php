@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<form method="post" action="/normaluser/store" enctype="multipart/form-data">
    @csrf
    <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="name" name="name" placeholder="Text input">
        </div>
    </div>
    <div class="field">
        <label class="label">Email</label>
        <div class="control">
            <input class="input is-danger" type="email" name="email" placeholder="Email input">
        </div>
    </div>
    <div class="field">
        <label class="label">Password</label>
        <div class="control">
            <input class="input is-danger" type="password" name="password" placeholder="Email input">
        </div>
    </div>
    <div class="field">
        <label class="label">Phone Number</label>
        <div class="control">
            <input class="input is-danger" type="phone_number" name="phone_number" placeholder="Email input">
        </div>
    </div>
    <div class="field">
        <label class="label">Address</label>
        <div class="control">
            <input class="input is-danger" type="address" name="address" placeholder="Email input">
        </div>
    </div>
    <div class="field">
        <label class="label">Profile Image</label>
        <div class="control">
            <input class="input is-danger" type="file" name="image">
        </div>
    </div>
    <div class="field is-grouped">
        <div class="control">
            <button class="button is-link">Submit</button>
        </div>
        <div class="control">
            <button class="button is-link is-light">Cancel</button>
        </div>
    </div>
</form>