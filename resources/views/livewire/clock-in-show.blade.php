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
                <table class="table clockIn-table">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Clocked in</th>
                            <th scope="col">Clocked out</th>
                            <th scope="col" class="action"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form wire:submit.prevent="saveClockIn">
                            <input type="hidden" wire:model="clockIn">
                            <input type="submit" name="clockIn" class="btn btn-outline-primary mb-4"
                                value="Clock in" />
                        </form>
                        @foreach ($clockIns as $clockIn)
                            <tr>
                                <td>{{ date_format(new DateTime($clockIn->regEntry), 'd.m.Y') }}</td>
                                <td>
                                    {{ $clockIn->regEntry ? date_format(new DateTime($clockIn->regEntry), 'H:i:s') : '' }}
                                </td>
                                <td>
                                    {{ $clockIn->regExit ? date_format(new DateTime($clockIn->regExit), 'H:i:s') : '' }}
                                </td>
                                <td>
                                    @if (!$clockIn->regEntry)
                                        <form wire:submit.prevent="saveClockIn">
                                            <input type="hidden" wire:model="clockIn">
                                            <input type="submit" name="clockIn" value="Clock in" />
                                        </form>
                                    @else
                                        <form wire:submit.prevent="saveClockOut({{ $clockIn->id }})">
                                            <input type="submit" class="btn btn-outline-info" name="clockOut"
                                                value="Clock out" />
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            {{-- @empty
                            <tr>
                                <td colspan="8">
                                    <p class="text-center">Not found!</p>
                                </td>
                            </tr> --}}
                        @endforeach

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
