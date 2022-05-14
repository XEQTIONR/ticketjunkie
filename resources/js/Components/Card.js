import React from 'react';

export default function Card({banner, title}){
    return (

            <div className="overflow-hidden shadow-sm rounded-md">
                <div className="relative p-0">
                    <img className="w-full h-auto" src={banner} />
                    <div className="absolute bottom-0 left-0 flex">
                        <div className="p-3 my-4 mx-3 rounded-md bg-white">{title}</div>
                    </div>
                </div>
            </div>
    );
}
