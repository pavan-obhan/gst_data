<?php
$gross_total = 0;
$gst_total = 0;
$total = 0;
?>

<x-app-layout>
    <x-slot name="header">
        <center>
            <form method="GET" action="/view" class="flex justify-center">

                    <div class="mb-6">
                        <label for="from" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            from
                        </label>
                        <input class="border border-gray-400 p-2  rounded"
                               type="date"
                               name="from"
                               id="from"
                               @php
                                   if (request('from'))
                                    {
                                        echo "value=".request('from');
                                    }
                               @endphp
                               required
                        >
                        @error('from')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6 ml-3">
                        <label for="to" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            to
                        </label>
                        <input class="border border-gray-400 p-2 rounded"
                               type="date"
                               name="to"
                               id="to"
                               @php
                                   if (request('to'))
                                    {
                                        echo "value=".request('to');
                                    }
                               @endphp
                               required
                        >
                        @error('to')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <button class="ml-3"></button>
            </form>
        </center>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{\Illuminate\Support\Facades\Auth::user()->name." ".\Illuminate\Support\Facades\Auth::user()->gst_number}}
        </h2>
    </x-slot>

    <!-- component -->
    <!-- This is an example component -->
    <div class="w-full mx-auto">

        <div class="flex flex-col">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Sr.no.
                                </th>
                    </div>
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Date
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Bill No.
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Party Name & Addr.
                    </th>

                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        HSN SAC
                    </th>

                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        GSTIN
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Gross Total
                    </th>

                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        GST %
                    </th>

                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        GST Value
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Total
                    </th>
                    <th scope="col" class="p-4">
                        <span class="sr-only">Edit</span>
                    </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach($data as $info)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$info->id}}
                            </td>

                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$info->date}}
                            </td>

                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$info->bill_number}}
                            </td>

                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$info->party_name_and_address}}
                            </td>

                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$info->hsnsac}}
                            </td>

                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$info->gstin}}
                            </td>

                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$info->gross_total}}
                                <?php $gross_total = $gross_total + $info->gross_total ?>
                            </td>

                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$info->gst_percentage."%"}}
                            </td>

                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$info->gst_value}}
                                @php
                                    $gst_total = $gst_total + $info->gst_value;
                                @endphp
                            </td>

                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$info->total}}
                                @php
                                    $total = $total+$info->total
                                @endphp
                            </td>


                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                <a href="/gst/{{$info->id}}/edit" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>&nbsp;&nbsp;
                                <form method="POST" action="/gst/{{$info->id}}/delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600">Delete</button>
                                </form>
                            </td>
                            @endforeach

                        </tr>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{"Gross Total = ".$gross_total}}</td>
                            <td></td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                GST Total = {{$gst_total}}</td>
                            <td></td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Total = {{$total}}</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    </div>
</x-app-layout>
