export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
};

export type NavigationLink = {
    id: number|undefined,
    name: string,
    href: string,
    icon: any,
    current: boolean
};

export type PageNavigation = {
    navigation: NavigationLink[],
    teams: NavigationLink[],
    userNavigation: NavigationLink[]
};
