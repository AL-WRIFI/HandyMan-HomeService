<div class="form-check form-switch "
    style=" display: flex; flex-direction: row;justify-content: center;">
    <div>
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" style="
            height: 25px;
            width: 50px;
            margin-right:auto;"
            data-bs-toggle="modal"  data-bs-target="#deactivateAlertModal" checked="" wire:model="isActive">
    </div>
    <div>
         
        <label class="form-check-label" for="flexSwitchCheckDefault" style="margin-left: 15px;">
            {{$status}}
        </label>
    </div>
</div>