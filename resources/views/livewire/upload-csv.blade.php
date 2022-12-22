<form wire:submit.prevent="uploadCsv" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="csv-file">
            Upload CSV file
        </label>
        <input type="file" name="csvFile" wire:model="csvFile">
        @error('csvFile')
        <span>{{ $message }}</span>
        @enderror
        <button type="submit">
            Upload
        </button>
    </div>
</form>
