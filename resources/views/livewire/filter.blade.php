<div class=" ml-4 my-4">
<div  >

<div class="grid grid-cols-3 gap-3 content-start ...">
  <div><label for="exp_input" class="text-right block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Years of Experience</label></div>
  <div> <select id="exp_input" wire:model="years_of_exp"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>==Choose==</option>
                @foreach($years_of_exp_dd as $row)
                    <option value="{{ $row->years_of_exp }}">{{ $row->years_of_exp }}</option>
                @endforeach                
        </select> 
     </div>
  </div>
</div>

<br/>
<div class="overflow-x-auto relative shadow-md sm:rounded-lg my-8">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                    Timestamp
                </th>
                <th scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                    Permission
                </th>
                <th scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                    Gender
                </th>
                <th scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                    Postal Code
                </th>
                <th scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                   Education
                </th>
                <th scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                    Education Inst.
                </th>
                <th scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                    Years of Exp
                </th>
                <th scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                  Employee Commitment
                </th>
                <th scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                  Emp Type
                </th>
                <th scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                  Job Category
                </th>
                <th scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                  Job Title
                </th>
                <th scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                  Monthly Salary
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($survey_data as $survey)
           
           
            <tr>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white border-collapse border border-slate-400">
                    {{ $survey->timestamp }}
                </th>
                <td class="py-4 px-6 border-collapse border border-slate-400">
                {{ ucfirst($survey->permission) }}
                </td>
                <td class="py-4 px-6 border-collapse border border-slate-400">
                {{ $survey->gender }}
                </td>
                <td class="py-4 px-6 border-collapse border border-slate-400">
                {{ $survey->postal_code }}
                </td>
                <td class="py-4 px-6 border-collapse border border-slate-400">
                {{ $survey->education }}
                </td>
                <td class="py-4 px-6 border-collapse border border-slate-400">
                {{ $survey->edu_insti }}
                </td>
                <td class="py-4 px-6 border-collapse border border-slate-400">
                {{ $survey->years_of_exp }}
                </td>
                <td class="py-4 px-6 border-collapse border border-slate-400">
                {{ $survey->emp_commitment }}
                </td>
                <td scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                {{ $survey->emp_type }}
                </td>
                <td scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                {{ $survey->job_cat_name }}
                </td>
                <td scope="col" class="py-3 px-6 border-collapse border border-slate-400">
                {{ $survey->job_title }}
                </td>
                <td class="py-4 px-6 border-collapse border border-slate-400">
                {{ $survey->monthly_salary }}
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>
<div class="class="my-8">
    {{ $survey_data->links() }}
</div>

</div>
</div>
