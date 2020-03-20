import React from 'react'

function Stat({ title, value, to, icon }) {
    return (
        <div class="rounded-md overflow-hidden shadow bg-white flex-1">
            <div class="px-6 py-4 flex items-center">
                <div class="bg-indigo-500 rounded-lg p-5 max-h-4">
                    <img src={icon} alt="" />
                </div>
                <div class="flex-1 ml-6 ">
                    <div class="font-bold text-sm text-gray-500 ">{title}</div>
                    <p class="text-gray-700 text-base text-3xl">
                        {value}
                    </p>
                </div>
            </div>
            <a href={to} class="bg-gray-200 flex px-6 py-2 justify-between items-center text-sm font-bold text-indigo-500">
                View all
                <span class="inline-block text-sm font-semibold text-gray-700">
                    <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
                </span>
            </a>
        </div>
    )
}

export default Stat
