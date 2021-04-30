<form action="/normaluser/update/{{$normalUsers->id}}" method="post">
    @csrf
    <div class="field">

        <label class="label">Name</label>
        <div class="control">
            <input class="input form-control" type="text" placeholder="Text input" name="name" value="{{$normalUsers->name}}">
        </div>
    </div>
    <div class="field">
        <label class="label">Email</label>
        <div class="control">
            <input class="input form-control is-danger" type="email" placeholder="Email input" name="email" value="{{$normalUsers->email}}">
        </div>
    </div>
    <div class="field">
        <label class="label">Address</label>
        <div class="control">
            <input class="input form-control is-danger" type="address" placeholder="Email input" name="address" value="{{$normalUsers->address}}">
        </div>
    </div>
    <div class="field">
        <label class="label">Phone Number</label>
        <div class="control">
            <input class="input form-control is-danger" type="phone_number" placeholder="Email input" name="phone_number" value="{{$normalUsers->phone_number}}">
        </div>
    </div>
    <div class="field">
              <label class="label">Profile Image</label>
              <div class="field" align="left">
                <input type="file" id="image" name="image" />
                <span class="pip">
                <img class="imageThumb" src="{{'/images/backend_images/user_image/small/'.$normalUsers->image}}" title="undefined">

                </span>
              </div>
            </div>
    <div class="field is-grouped d-flex">
        <div class="control">
            <button class="button is-link">Submit</button>
        </div>
        <div class="control">
            <button class="button is-link is-light">Cancel</button>
        </div>
    </div>
</form>