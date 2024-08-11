<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight inline-block">
                Patient
            </h2>
            <a href="{{ route('appointment.create') }}" style="color:blue"> Add Appointment</a>
            {{-- <a href="{{ route('appointment.doctor') }}" style="color:blue"> View doctors Appointment</a> --}}
            {{-- <a href="{{ route('appointment.create') }}" style="color:blue"> View patients Appointment</a> --}}

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1>Welcome, {{ $patients->name }}</h1>
                    <p>Email: {{ $patients->user->email }}</p>

                    <h2>Your Appointments:</h2>
                    @if ($appointments->isEmpty())
                        <p>You have no upcoming appointments.</p>
                    @else
                        <ul>
                            @foreach ($appointments as $appointment)
                                <li>
                                    Date: {{ $appointment->date }} - Time: {{ $appointment->time }} - Details:
                                    {{ $appointment->details }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
