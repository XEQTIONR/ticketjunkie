import React, { useState } from 'react';
import { ReactSVG } from 'react-svg'
import {Link} from "@inertiajs/inertia-react";
import ApplicationLogo from "@/Components/ApplicationLogo";
import NavLink from "@/Components/NavLink";
import Dropdown from "@/Components/Dropdown";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink";

export default function Nav({auth}) {
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);
    return (
        <>
        <div className={(showingNavigationDropdown ? 'block' : 'hidden') + ' md:hidden'}>
            <div className="pt-2 pb-3 space-y-1">
                <ResponsiveNavLink href={route('dashboard')} active={route().current('dashboard')}>
                    Dashboard
                </ResponsiveNavLink>
            </div>

            <div className="pt-4 pb-1 border-t border-gray-200">
                <div className="px-4">
                    <div className="font-medium text-base text-gray-800">{auth.user.name}</div>
                    <div className="font-medium text-sm text-gray-500">{auth.user.email}</div>
                </div>

                <div className="mt-3 space-y-1">
                    <ResponsiveNavLink method="post" href={route('logout')} as="button">
                        Log Out
                    </ResponsiveNavLink>
                </div>
            </div>
        </div>
        <nav className="bg-white border-b border-gray-100 fixed md:sticky bottom-0 md:top-0 w-full ">

            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex h-16">
                    <div className="flex justify-around w-full">
                        <div className="shrink-0 hidden md:flex items-center">
                            <Link href="/">
                                <ApplicationLogo className="hidden sm:block h-9 w-auto text-gray-500" />
                            </Link>
                        </div>

                        <div className="sm:-my-px sm:ml-10 flex items-center">
                            <NavLink href={route('dashboard')} active={route().current('dashboard')} onClick={() => setShowingNavigationDropdown(false)}>
                                <ReactSVG className={'text-2xl md:hidden'} src={'/images/search.svg'}/>
                                Search
                            </NavLink>
                        </div>
                        <div className="sm:-my-px sm:ml-10 flex items-center">
                            <NavLink href={route('dashboard')} onClick={() => setShowingNavigationDropdown(false)}>
                                <ReactSVG className={'text-2xl md:hidden'} src={'/images/heart.svg'}/>
                                Favorites
                            </NavLink>
                        </div>
                        <div className="sm:-my-px sm:ml-10 flex items-center">
                            <NavLink href={route('dashboard')} onClick={() => setShowingNavigationDropdown(false)}>
                                <ReactSVG className={'text-2xl md:hidden'} src={'/images/ticket.svg'}/>
                                My Events
                            </NavLink>
                        </div>
                        <div className="sm:-my-px sm:ml-10 flex md:hidden flex-col justify-center items-center">
                            <ReactSVG className={'text-2xl md:hidden'} src={'/images/user.svg'}
                                      onClick={() => setShowingNavigationDropdown((previousState) => !previousState)}
                            />
                            Account
                        </div>
                    </div>

                    <div className="hidden md:flex sm:items-center sm:ml-6">
                        <div className="ml-3 relative">
                            <Dropdown>
                                <Dropdown.Trigger>
                                        <span className="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                className="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {auth.user.name}

                                                <svg
                                                    className="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fillRule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clipRule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                </Dropdown.Trigger>

                                <Dropdown.Content>
                                    <Dropdown.Link href={route('logout')} method="post" as="button">
                                        Log Out
                                    </Dropdown.Link>
                                </Dropdown.Content>
                            </Dropdown>
                        </div>
                    </div>


                </div>
            </div>


        </nav>
        </>
    )
}
