import React from 'react';
import ReactDOM from 'react-dom';

function RecentActivities() {
    return (
        <div className="container">
            
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
