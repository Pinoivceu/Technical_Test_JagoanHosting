import { SidebarProvider } from "@/components/ui/sidebar";
import { AppSidebar } from "@/components/app-sidebar";

export default function DashboardLayout({
    children,
}: {
    children: React.ReactNode;
}) {
    return (
        <main className="">
            <SidebarProvider>
                <AppSidebar />

                {children}

            </SidebarProvider>
        </main>
    );
}
