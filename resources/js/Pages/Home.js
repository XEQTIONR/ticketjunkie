import React from 'react';
import App from '@/Layouts/App';
import { Head, Link } from '@inertiajs/inertia-react';
import Card from '@/Components/Card';
import _ from 'lodash';

export default function Home({ auth, errors, shows }) {

    //category
    let data = _.groupBy(shows, (item) => item.type.id );
    let groupByType = _.map(data, (item) => {
        return { [item[0].type.name]: item }
    })
    groupByType = (_.merge(...groupByType));

    let types = shows.map( show => show.type).filter( (type, index) =>  shows.findIndex( (item) => item.type.id === type.id) === index);

    return (

        <App
            auth={auth}
            errors={errors}
            header={<h3 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h3>}
        >
            <Head title="Dashboard" />
            <div className="max-w-screen-xl mx-auto">
                <h2 className="font-bold text-2xl my-4 p-3">Browse By Category</h2>
            </div>
            <div className="flex flex-wrap max-w-screen-xl mx-auto">
            {
                types.map( type => (
                    <Link href="/dashboard" key={type.id} className="w-1/2 md:w-1/4 p-1 md:p-3">
                        <Card banner={type.banner} title={type.name}/>
                    </Link>
                ))
            }
            </div>

            <div className="max-w-screen-xl mx-auto">
                <h2 className="font-bold text-2xl my-4 p-3">Top Selling</h2>
            </div>
            {Object.entries(groupByType).map( ([key, value]) => {
                return(
                    <React.Fragment key={key}>
                        <div className="max-w-screen-xl mx-auto">
                            <h3 className="my-4 text-xl font-bold max-w-screen-xl p-3">{key}</h3>
                        </div>
                        <div className="flex flex-wrap justify-start max-w-screen-xl mx-auto">
                        {
                            value.map(item => (
                                <React.Fragment key={item.id}>
                                    <Link href="/dashboard" className="hidden md:block w-1/3 lg:w-1/4 p-3">
                                        <Card
                                            banner={item.banner}
                                            title={<>
                                              {item.name}
                                              <br />
                                              {item.slots.length} Events
                                            </>}
                                        />
                                    </Link>
                                    <Link href="/dashboard" className="md:hidden w-full p-3 flex border-b-2">
                                        <img className="h-14 rounded" src={item.banner} />
                                        <div className="pl-3">
                                            <h3 className="font-bold text-blue-500">{item.name}</h3>
                                            {item.slots.length} Events
                                        </div>
                                    </Link>
                                </React.Fragment>
                            ))
                        }
                        </div>
                    </React.Fragment>
            )})
        }
        </App>
    );
}
