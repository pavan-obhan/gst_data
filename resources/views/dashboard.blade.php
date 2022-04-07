<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/submit" class="" method="POST">
                        @csrf
                        <div class="flex items-stretch">
                            <div class="mb-6">
                                <label for="Date" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    Date
                                </label>
                                <input class="border border-gray-400 p-2 rounded"
                                       type="date"
                                       name="date"
                                       id="date"
                                       required
                                >
                                @error('date')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-6 pl-3">
                                <label for="Bill Number" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    Bill Number
                                </label>
                                <input class="border border-gray-400 p-2 rounded"
                                       type="text"
                                       name="bill_number"
                                       id="bill_number"
                                       required
                                >
                                @error('bill_number')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-6 pl-3">
                                <label for="Party Name and Address"
                                       class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    Party Name and Address
                                </label>
                                <input class="border border-gray-400 p-2 rounded"
                                       type="text"
                                       name="party_name_and_address"
                                       id="party_name_and_address"
                                       required
                                >
                                @error('party_name_and_address')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-6 pl-3">
                                <label for="HSN SAC" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    HSN SAC
                                </label>
                                <input class="border border-gray-400 p-2 rounded"
                                       type="text"
                                       name="hsnsac"
                                       id="hsnsac"
                                       required
                                >
                                @error('hsnsac')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-6 pl-3">
                                <label for="GSTIN" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    GSTIN
                                </label>
                                <input class="border border-gray-400 p-2 rounded"
                                       type="text"
                                       name="gstin"
                                       id="gstin"
                                       required
                                >
                                @error('gstin')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center mt-4">

                            <div class="mb-6">
                                <label for="Gross Total" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    Gross Total
                                </label>
                                <input class="border border-gray-400 p-2 rounded"
                                       type="number"
                                       name="gross_total"
                                       id="gross_total"
                                       required
                                >
                                @error('gross_total')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="pl-3">
                                <select id="gst_percentage" name="gst_percentage" class="rounded border border-gray-400"
                                        onclick="calcTotal()" onchange="calcTotal()">
                                    <option selected disabled>GST Percentage</option>
                                    <option value="18">18 %</option>
                                    <option value="28">28 %</option>
                                    <option value="36">36 %</option>
                                </select>
                            </div>
                            <div class="mb-6 pl-3">
                                <label for="GST Value" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    GST Value
                                </label>
                                <input class="border border-gray-400 p-2 w-full rounded"
                                       type="text"
                                       name="gst_value"
                                       id="gst_value"
                                       required
                                >
                                @error('gst_value')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-6 pl-3">
                                <label for="Total" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                    Total
                                </label>
                                <input class="border border-gray-400 p-2 w-full rounded"
                                       type="text"
                                       name="total"
                                       id="total"
                                       required

                                >
                                @error('Total')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <script>
                                function calcTotal() {
                                    let grossTotal = document.getElementById("gross_total").value;
                                    let gstPercentage = document.getElementById("gst_percentage").value;
                                    let total = parseFloat(grossTotal * (gstPercentage / 100)) + parseFloat(grossTotal);
                                    document.getElementById("gst_value").value = parseFloat(grossTotal * (gstPercentage / 100)).toFixed(2);
                                    return document.getElementById("total").value = total.toFixed(2);
                                }
                            </script>
                        </div>
                        <x-button class="ml-3 mt-4 flex align-middle">
                            Submit
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
