<div class="  maincont ">


    <div class="container">
        <div class="checkbox-group my-3">
            <legend class="checkbox-group-legend">اختيار ايام العمل</legend>
            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox-input" wire:model="workingDays.Saturday" checked="{{ isset($workingDays['Saturday']) && $workingDays['Saturday'] }}"/>
                    <span class="checkbox-tile">
                        <span class="checkbox-label">السبت</span>
                    </span>
                </label>
            </div>
            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox-input" wire:model="workingDays.Sunday" checked="{{ isset($workingDays['Sunday']) && $workingDays['Sunday'] }}"/>
                    <span class="checkbox-tile">

                        <span class="checkbox-label">الاحد</span>
                    </span>
                </label>
            </div>

            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox-input" wire:model="workingDays.Monday" checked="{{ isset($workingDays['Monday']) && $workingDays['Monday'] }}"/>
                    <span class="checkbox-tile">

                        <span class="checkbox-label">الاثنين</span>
                    </span>
                </label>
            </div>
            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox-input" wire:model="workingDays.Tuesday" checked="{{ isset($workingDays['Tuesday']) && $workingDays['Tuesday'] }}"/>
                    <span class="checkbox-tile">

                        <span class="checkbox-label">الثلاثاء</span>
                    </span>
                </label>
            </div>
            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox-input"  wire:model="workingDays.Wednesday" checked="{{ isset($workingDays['Wednesday']) && $workingDays['Wednesday'] }}"/>
                    <span class="checkbox-tile">

                        <span class="checkbox-label">الاربعاء</span>
                    </span>
                </label>
            </div>
            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox-input" wire:model="workingDays.Thursday" checked="{{ isset($workingDays['Thursday']) && $workingDays['Thursday'] }}"/>
                    <span class="checkbox-tile">

                        <span class="checkbox-label">الخميس</span>
                    </span>
                </label>
            </div>
            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="checkbox" class="checkbox-input" wire:model="workingDays.Friday" checked="{{ isset($workingDays['Friday']) && $workingDays['Friday'] }}"/>
                    <span class="checkbox-tile">
                        <span class="checkbox-label">الجمعه</span>
                    </span>
                </label>
            </div>
            <button type="submit" wire:click="saveWorkingDays" data-submit>حفظ</button>

        </div>


        <div class="timework" style="  width: 80%; max-width: 600px;  margin-left: auto;margin-right: auto;">

            <legend class="checkbox-group-legend">اختيار اوقات العمل</legend>
            <div class="row  " style="flex-direction: row-reverse;">

                <div class="col-sm-12 col-md-6 mt-2 d-flex justify-content-center ">
                    <span class="timeinpt-tile">
                        <input type="time" value="00:00:01" style="
                            border: 0;
                            background-color: white;
                            text-align: end;
                            border-right: 0.5px solid rgba(0, 0, 0, 0.386);
                            margin-right:0.6rem;
                            padding: 0.3rem;
                        ">
                        <span class="checkbox-label">من</span>
                    </span>
                </div>

                <div class="col-sm-12 col-md-6 mt-2 d-flex justify-content-center">
                    <span class="timeinpt-tile">
                        <input type="time" value="00:00:01" style="
                                        border: 0;
                                        background-color: white;
                                        text-align: end;
                                        border-right: 0.5px solid rgba(0, 0, 0, 0.386);
                                        margin-right:0.6rem;
                                        padding: 0.3rem;
                                    ">
                        <span class="checkbox-label">الى</span>
                    </span>
                </div>
            </div>

        </div>

        {{-- <div class="checkbox-group my-3">
            <legend class="checkbox-group-legend">اختيار ايام العمل</legend>
            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="radio" class="checkbox-input" name="flexRadioDefault" id="flexRadioDefault"  />
                    <span class="checkbox-tile">

                        <span class="checkbox-label">السبت</span>
                    </span>
                </label>
            </div>

            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="radio" class="checkbox-input" name="flexRadioDefault" id="flexRadioDefault1" />
                    <span class="checkbox-tile">

                        <span class="checkbox-label">الاحد</span>
                    </span>
                </label>
            </div>

            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="radio" class="checkbox-input" name="flexRadioDefault" id="flexRadioDefault2" />
                    <span class="checkbox-tile">

                        <span class="checkbox-label">الاثنين</span>
                    </span>
                </label>
            </div>
            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="radio" class="checkbox-input" name="flexRadioDefault" id="flexRadioDefault3"/>
                    <span class="checkbox-tile">

                        <span class="checkbox-label">الثلاثاء</span>
                    </span>
                </label>
            </div>
            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="radio" class="checkbox-input" name="flexRadioDefault" id="flexRadioDefault4" />
                    <span class="checkbox-tile">

                        <span class="checkbox-label">الاربعاء</span>
                    </span>
                </label>
            </div>
            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="radio" class="checkbox-input" name="flexRadioDefault" id="flexRadioDefault5"/>
                    <span class="checkbox-tile">

                        <span class="checkbox-label">الخميس</span>
                    </span>
                </label>
            </div>
            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <input type="radio" class="checkbox-input" name="flexRadioDefault" id="flexRadioDefault6"/>
                    <span class="checkbox-tile">
                        <span class="checkbox-label">الجمعه</span>
                    </span>
                </label>
            </div>


        </div> --}}
    </div>


</div>
