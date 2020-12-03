<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead>
              <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  CSV
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  User
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Uploaded
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50">
                  <span class="sr-only">View</span>
                </th>
                @if (Auth::user()->id == 1)
                <th scope="col" class="px-6 py-3 bg-gray-50">
                  <span class="sr-only">Delete</span>
                </th>
                @endif
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($list as $item)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ $item->name }}</div>
                  <div class="text-sm text-gray-500">CSV file</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ $item->user->name }}
                      </div>
                      <div class="text-sm text-gray-500">
                        {{ $item->user->email }}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y, g:i a') }}</div>
                  </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a target="_blank" href="{{ url($item->path) }}" class="bg-indigo-100 text-indigo-600 px-6 rounded-full hover:text-indigo-900">View</a>
                </td>
                @if (Auth::user()->id == 1)
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button wire:click="deleteItem({{ $item->id }})" class="bg-red-100 text-red-600 px-6 rounded-full hover:text-red-900">
                        Delete
                    </button>
                </td>
                @endif
              </tr>
              @empty
              <p class="text-center text-blue-600 md:text-blue-600 ...">
                No CSV files found
              </p>
              @endforelse

              <!-- More rows... -->
            </tbody>
          </table>
          {{ $list->links() }}
        </div>
      </div>
    </div>
  </div>
