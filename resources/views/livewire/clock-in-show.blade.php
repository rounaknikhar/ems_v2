<div>

    <h1 class="pb-4 mb-4 border-bottom">Clock in</h1>

    <section class="py-4">
        <h4>Clock in</h4>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="w-100">
            <div class="table-responsive">
                <table class="table clockIn-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Clocked in</th>
                            <th scope="col">Clocked out</th>
                            <th scope="col">Duration</th>
                            <th scope="col" class="action"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form wire:submit.prevent="saveClockIn">
                            <input type="hidden" wire:model="clockIn">
                            <input type="submit" name="clockIn" class="btn btn-outline-primary my-4"
                                value="Clock in" />
                        </form>
                        @forelse ($clockIns as $clockIn)
                            <tr>
                                <td>{{ date_format(new DateTime($clockIn->regEntry), 'd.m.Y') }}</td>
                                <td id="clockIn">
                                    {{ $clockIn->regEntry ? date_format(new DateTime($clockIn->regEntry), 'H:i:s') : '' }}
                                </td>
                                <td id="clockOut">
                                    {{ $clockIn->regExit ? date_format(new DateTime($clockIn->regExit), 'H:i:s') : '' }}
                                </td>
                                <td id="totalHours">
                                    @php
                                        $time = new Carbon($clockIn->regEntry);
                                        $shift_end_time = new Carbon($clockIn->regExit);
                                        // echo \Carbon\Carbon::parse($time)->diffForHumans($shift_end_time);
                                        echo \Carbon\Carbon::parse($shift_end_time)
                                            ->diff($time)
                                            ->format('%H:%i:%s');
                                    @endphp

                                </td>
                                <td>
                                    <form wire:submit.prevent="saveClockOut({{ $clockIn->id }})">
                                        <input type="submit"
                                            class="btn btn-outline-secondary {{ $clockIn->regExit ? 'd-none' : '' }}"
                                            name="clockOut" value="Clock out" />
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <p class="text-center">Not found!</p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $clockIns->links() }}
            </div>
    </section>


    {{-- @include('livewire.modals.add-clock-in')
    @include('livewire.modals.update-clock-in')
    @include('livewire.modals.delete-clock-in') --}}
</div>
