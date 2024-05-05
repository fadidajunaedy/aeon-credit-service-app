<dialog id="modal_confirmation_signout" class="modal">
    <div class="modal-box text-center">
        <h3 class="font-bold text-lg mb-4">Sign out confirmation</h3>
        <p>Are you sure want to Sign Out?</p>
        <div class="modal-action flex items-center">
            <form method="dialog">
                <button class="btn">Close</button>
            </form>
            <form 
            method="POST" 
            action="{{ url('/auth/logout') }}" 
            class="rounded-none flex">
                @csrf
                <button type="submit" class="btn btn-error text-white">
                    Confirm
                </button>
            </form>
        </div>
    </div>
</dialog>