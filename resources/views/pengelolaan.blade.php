@extends('components.layout')
@section('title', 'MegaVerse | My List')
@section('content')
 <div class="container mx-auto mt-8 px-4">
    <div class="bg-pink-100 rounded-2xl p-6 shadow-md">
        <h2 class="text-pink-600 text-xl font-bold">New Activity</h2>
        <div class="flex items-center mt-4">
            <input type="text" placeholder="Add a new activity..." class="w-full px-4 py-2 border-2 border-pink-300 rounded-lg shadow-inner focus:outline-none">
            <button id="openModal" class="ml-4 px-4 py-2 bg-pink-500 text-white rounded-lg shadow-md hover:bg-pink-600">
                <i class="fas fa-pen"></i> Add
            </button>
        </div>
    </div>
    <div id="modal" class="fixed inset-0 bg-transparant bg-black/50 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-xl p-6 w-1/3 shadow-lg">
            <h3 class="text-xl font-bold text-pink-600 mb-4">Add New Activity</h3>
            <form id="activityForm" action="{{ route('addSchedule') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="Activity" class="block text-gray-700">Activity</label>
                    <input type="text" name="Activity" id="activity" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="Status" class="block text-gray-700">Status</label>
                    <select name="Status" id="status" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg" required>
                        <option value="Not started">Not started</option>
                        <option value="In progress">In progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="Waktu" class="block text-gray-700">Waktu</label>
                    <input type="datetime-local" name="Waktu" id="waktu" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="Kategori" class="block text-gray-700">Kategori</label>
                    <input type="text" name="Kategori" id="kategori" class="w-full px-4 py-2 border-2 border-gray-300 rounded-lg" required>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" id="closeModal" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600">Add</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('openModal').addEventListener('click', function () {
            const newActivity = document.querySelector('input[placeholder="Add a new activity..."]').value;
            document.getElementById('activity').value = newActivity;
            document.getElementById('modal').classList.remove('hidden');
        });
        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('modal').classList.add('hidden');
        });
    </script>
</div>
<div class="container mx-auto mt-8 px-4">
    <div class="bg-pink-100 rounded-2xl p-6 shadow-md">
        <h2 class="text-pink-600 text-xl font-bold">Schedule</h2>
        <div class="mt-4">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b-2 border-pink-300">
                        <th class="px-4 py-2 text-pink-600 font-bold">Activity</th>
                        <th class="px-4 py-2 text-pink-600 font-bold">Status</th>
                        <th class="px-4 py-2 text-pink-600 font-bold">Waktu</th>
                        <th class="px-4 py-2 text-pink-600 font-bold">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedule_items as $schedule)
                    <tr class="border-b border-pink-200">
                            <td class="px-4 py-2">{{ $schedule['Activity'] }}</td>
                            <td class="px-4 py-2">
                                @if ($schedule['Status'] === 'Not started')
                                    <span class="bg-red-500 text-white px-2 py-1 rounded-full">{{ $schedule['Status'] }}</span>
                                @elseif ($schedule['Status'] === 'In progress')
                                    <span class="bg-blue-500 text-white px-2 py-1 rounded-full">{{ $schedule['Status'] }}</span>
                                @elseif ($schedule['Status'] === 'Completed')
                                    <span class="bg-green-500 text-white px-2 py-1 rounded-full">{{ $schedule['Status'] }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $schedule['Waktu'] }}</td>
                            <td class="px-4 py-2">
                                <span class="bg-pink-300 text-pink-800 px-2 py-1 rounded-full">{{ $schedule['Kategori'] }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container mx-auto mt-8 px-4">
    <div class="bg-pink-100 rounded-2xl p-6 shadow-md">
        <h2 class="text-pink-600 text-xl font-bold">Weekly Task</h2>
        <div class="mt-4 space-y-4">
            @foreach ($weekly_items as $item)
                <div class="flex items-center justify-between bg-white rounded-lg shadow px-4 py-2">
                    <span class="flex items-center space-x-2">
                        <i class="fas fa-thumbtack text-pink-500"></i>
                        <span>{{ $item['Task'] }}</span>
                    </span>
                    <button class="px-4 py-2 bg-pink-500 text-white rounded-lg shadow-md hover:bg-pink-600">
                        Details
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
