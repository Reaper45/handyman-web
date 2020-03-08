import React from 'react';
import ReactDOM from 'react-dom';

import Job from "./jobs/Job";

function RecentActivities() {
    return (
        <div className="mt-8">
            <ul className="">
                <li className="bg-white mb-2 border border-gray-400 rounded-md">
                    <Job />
                </li>
                <li className="bg-white mb-2 border border-gray-400 rounded-md">
                    <Job />
                </li>
                <li className="bg-white mb-2 border border-gray-400 rounded-md">
                    <Job />
                </li>
            </ul>
        </div>
    );
}

export default RecentActivities;

if (document.getElementById('recent-activities')) {
    ReactDOM.render(
        <RecentActivities />,
        document.getElementById("recent-activities")
    );
}
