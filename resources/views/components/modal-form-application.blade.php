<dialog id="modal_form_application" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg mb-4">Form Application</h3>
        <form
        method="POST" 
        action=""
        >
            @csrf
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text font-semibold">CV</span>
                    <span class="label-text label-text-alt">(pdf, docx, jpg, jpeg, png (Max: 5mb))</span>
                </div>
                <input 
                type="file" 
                class="file-input file-input-bordered"
                required>
            </label>
            <button
            id="application-submit"
            type="submit"
            ></button>
        </form>
        <div class="modal-action flex items-center">
            <form method="dialog" class="flex gap-2">
                <button class="btn">Close</button>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</dialog>